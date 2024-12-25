import CompanyLayout from '@/Layouts/company-layout';
import DataTableDemo, { _N, _S, TaskData } from '@/Pages/Company/Tasks/table';
import { PageProps } from '@/types';
// import { DateTime } from 'luxon';
// import moment from 'moment';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { router } from '@inertiajs/react';
import { CellContext, ColumnDef, HeaderContext } from '@tanstack/react-table';
import { ArrowUpDown, Eye, MoreHorizontal } from 'lucide-react';
import React, { useCallback, useMemo } from 'react';
import moment from './time';
// type Task = {};

type PaginatedData<T> = {
    data: T[];
    first_page_url: _S;
    from: _N;
    last_page: _N;
    last_page_url: _S;
    links: {
        url: _S;
        label: _S;
        active: boolean;
    }[];
    next_page_url: _S;
    path: _S;
    per_page: _N;
    prev_page_url: _S;
    to: _N;
    total: _N;
};
type Task = {
    id: number;
    code: string;
    notes: _S;
    is_published: boolean;
    is_online: boolean | undefined;
    is_available: boolean | undefined;
    company_id: _N;
    customer: {
        id: number;
        user: {
            name: _S;
        };
    };
    viewer_id: _N;
    customer_id: _N;
    task_status_id: _N;
    city_id: _N;
    city: {
        id: number;
        name: string;
    };
    location: { latitude: _N; longitude: _N };
    status:
        | {
              id: number;
              name: string;
              color: string;
          }
        | undefined;
    received_at: _S;
    must_do_at: _S;
    finished_at: _S;
    published_at: _S;
    order_number: _S;
    suk_number: _S;
    license_number: _S;
    scheme_number: _S;
    piece_number: _S;
    age: _S;
    address: _S;
    district: _S;
    estate_type: _S;
    near_south: _S;
    near_north: _S;
    near_west: _S;
    near_east: _S;
    company_feedback: _S;
    attach: _S;
    created_at: _S;
    updated_at: _S;
};

const select: ColumnDef<TaskData> = {
    id: 'select',
    header: ({ table }) => (
        <Checkbox
            checked={
                table.getIsAllPageRowsSelected() ||
                (table.getIsSomePageRowsSelected() && 'indeterminate')
            }
            onCheckedChange={(value) =>
                table.toggleAllPageRowsSelected(!!value)
            }
            aria-label="Select all"
        />
    ),
    cell: ({ row }) => (
        <Checkbox
            checked={row.getIsSelected()}
            onCheckedChange={(value) => row.toggleSelected(!!value)}
            aria-label="Select row"
        />
    ),
    enableSorting: false,
    enableHiding: false,
};
const Index = ({
    tasks,
    q,
}: PageProps<{
    tasks: PaginatedData<Task> | undefined;
    // user: any;
    q: any;
}>) => {
    const onSearch_ = useCallback(
        ({ search, sort }: { search?: string; sort?: string }) => {
            const a = route().current()?.toString();
            const params = route().params;
            // const sort=
            router.get(
                route(`${a}`, {
                    _query: {
                        search: search ?? params['search'],
                        sort: sort ?? params['sort'],
                    },
                }),
                {},
                {
                    preserveState: true,
                    // preserveUrl: true,
                },
            );
        },
        [],
    );
    const onSearch: React.ChangeEventHandler<HTMLInputElement> = (s) =>
        onSearch_({ search: s.target.value });

    console.log(q, route().params);

    const dt = useCallback((time: _S) => {
        if (!time) return '---';
        return moment(time).fromNow().toLocaleLowerCase('ar');
    }, []);

    const { data } = useMemo((): { data: TaskData[] } => {
        const toTaskData = (t: Task): TaskData => {
            return {
                address: t.address,
                code: t.code,
                finished_at: dt(t.finished_at),
                id: t.id,
                must_do_at: dt(t.must_do_at),
                published_at: dt(t.published_at),
                received_at: dt(t.received_at),
                city: t.city?.name ?? '',
                customer: t.customer.user.name,
                status: t.status?.name,
                viewer: 'undefined',
                color: t.status?.color,
            };
        };
        return {
            data: tasks?.data.map(toTaskData) ?? [],
        };
    }, [dt, tasks?.data]);

    const columns = useMemo(
        () => [
            select,
            ...[
                // 'id',
                'code',
                'customer',
                'city',
                // 'address',
                'status',
                'received_at',
                'must_do_at',
                'finished_at',
                'published_at',
                'viewer',
            ].map((k) => ({
                enableHiding: true,
                accessorKey: k,
                header: ({ column }: HeaderContext<TaskData, unknown>) => {
                    // const kk: Record<string, string> = {};
                    const s =
                        route().params[`sort`] === `${k}:asc` ? 'desc' : 'asc';

                    const onClick = () => onSearch_({ sort: `${k}:${s}` });
                    // column.toggleSorting(column.getIsSorted() === 'asc');
                    return (
                        <Button variant="ghost" onClick={onClick}>
                            {k}
                            <ArrowUpDown />
                        </Button>
                    );
                },
                cell: ({ row }: CellContext<TaskData, unknown>) => (
                    <div className="text-sm lowercase">{row.getValue(k)}</div>
                ),
            })),

            {
                id: 'actions',
                enableHiding: false,
                cell: ({ row }) => {
                    const payment = row.original;
                    const onClick = () =>
                        navigator.clipboard.writeText(`${payment.id}`);
                    return <Actions onClick={onClick} />;
                },
            },
        ],
        [],
    );

    return (
        <CompanyLayout>
            <div className="h-[calc(100vh-4rem-14px)]" dir={'rtl'}>
                <div className="flex h-full flex-1 px-8">
                    <DataTableDemo
                        data={data}
                        columns={columns}
                        tableKey={'tasksTable'}
                        search={
                            <Input
                                placeholder="Filter emails..."
                                onChange={onSearch}
                                className="max-w-sm focus-visible:outline-none focus-visible:ring-0"
                            />
                        }
                    />
                </div>
            </div>
        </CompanyLayout>
    );
};

const Actions = ({ onClick }: { onClick: () => void }) => {
    return (
        <div className="flex items-center justify-end text-end">
            <Eye
                size={20}
                className="text-black/80 opacity-0 hover:cursor-pointer group-hover:opacity-100"
            />
            <DropdownMenu dir={'rtl'}>
                <DropdownMenuTrigger asChild>
                    <Button variant="link" className="h-8 w-8 p-0">
                        <span className="sr-only">Open menu</span>
                        <MoreHorizontal />
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end">
                    {/*<DropdownMenuLabel>Actions</DropdownMenuLabel>*/}
                    <DropdownMenuItem onClick={onClick}>
                        Copy payment ID
                    </DropdownMenuItem>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem>View customer</DropdownMenuItem>
                    <DropdownMenuItem>View payment details</DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    );
};

export default Index;
