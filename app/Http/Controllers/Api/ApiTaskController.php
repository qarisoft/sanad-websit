<?php

namespace App\Http\Controllers\Api;

use App\Enums\TasksStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskUpload;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//use http\Env\Response;

class ApiTaskController extends Controller
{
    private function _response(int $stats, string $msg, $data = null): JsonResponse
    {
        return response()->json([
            'status' => $stats,
            'message' => $msg,
            'data' => $data,
        ]);
    }

    public function index(): JsonResponse
    {
        $id = request()->user()->viewer?->id;
        if ($id == null) {
            return $this->_response(0, __('invalid credentials'), null);
        }
        return $this->_response(1, '',
            Task::query()
//                ->with('location:id,lat,lng')
                ->allowed($id)
                ->published()
                ->online()
                ->paginate()
                ->through(fn($t) => $this->taskResponse($t)),

        );
    }

//    public function close(Request $request, Task $task): array
//    {
//        $pricings = json_decode($request->get('pricing'), true);
//        $c = $request->get('company_feedback');
//        $payload = [
//            'c' => $c,
//        ];
//        foreach ($pricings as $pricing) {
//            $payload[] = $pricing['id'];
//            $p = EstatePricing::find($pricing['id']);
//            $p->update([
//                'total_price' => $pricing['total_price'],
//                'meter_square_price' => $pricing['meter_square_price'],
//                'meter_square_area' => $pricing['meter_square_area'],
//            ]);
//            $p->save();
//        }
//        $task->close();
//
//        return $this->response(stats: 1, msg: __('ok'), data: $payload);
//    }

    private function taskResponse(Task $task, ?array $pricing = null): array
    {
        return [
            'id' => $task->id,
            'code' => $task->code,
            'company_name' => $task->company->name,
            'finished_at' => $task->must_do_at,
            'finished_at_h' => Carbon::parse($task->must_do_at)->diffForHumans(),
            'location' => $task->location,
            'customer' => $task->customer->user->name,

            'company_feedback' => $task->company_feedback,
            'city' => $task->city?->name,
            'district' => $task->district,
            'estate_type' => $task->estate_type,


            'attach' => $task->attach,
            'address' => $task->address,
            'published_at' => $task->published_at,
            'published_at_h' => Carbon::parse($task->published_at)->diffForHumans(),
        ];
    }


    public function createUpload(Request $request, Task $task): JsonResponse
    {
        return $this->tryCaller(
            function () use ($request, $task) {
                $u = $task->uploads()->create([]);
                return $this->_response(1, '', [
                    'id' => $u->id,
                ]);
            }
        );

    }

    public function upload(Request $request, TaskUpload $upload): JsonResponse
    {
        $data = '';
        $request->validate([
            'img' => 'required',
            'img.*' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);
        try {
            $file = $request->file('img');
            $upload->addMedia($file)->toMediaCollection();
        } catch (\Exception $e) {
            $data = json_encode($e);
        }

        return $this->_response(1, 'good', $data);
    }

    public function accept(Request $request, Task $task): JsonResponse
    {
        $viewer = $request->user()->viewer;

        if ($viewer == null) {
            return $this->_response(0, __('you can\'t do this operation'));
        }
        if ($task->viewer()->exists()) {
            if ($task->viewer->id != $viewer->id) {
                return $this->_response(0, __('this task is already taken !'));
            }
        }
        $task->acceptBy($viewer);
        $p = $task->pricingEvaluations();

        return $this->_response(1, __('Task Accepted'), [
            'task' => $this->taskResponse($task),
            'pricing' => $p,
        ]);


    }

    private function mapper(Task $task)
    {
        return $this->taskResponse($task);
    }


    public function cancelTask(Request $request, Task $task)
    {
        try {
            //code...
            if ($task->viewer != null && $task->viewer->id == $request->user()->id) {

                $task->viewer()->dissociate();
                $task->users()->detach($request->user()->employee->id);
                $task->task_status_id = TasksStatusEnum::PUBLISHED->model()->id;
                $task->is_available = true;
                $task->save();

                return $this->response(1, __('task canceled'));
            }
        } catch (\Throwable $th) {
            return $this->response(0, __('operation failed'));
        }

        return $this->response(0, __('operation failed'));
    }
}
