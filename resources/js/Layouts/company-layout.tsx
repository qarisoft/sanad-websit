// import { AppSidebar } from "@/components/company/app-sidebar";
import CompanySidebar from '@/components/company/company-side-bar';
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { ScrollArea, ScrollBar } from '@/components/ui/scroll-area';
import { Separator } from '@/components/ui/separator';
import {
    Sidebar,
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from '@/components/ui/sidebar';
import { ChevronLeft, PanelLeft } from 'lucide-react';
import { PropsWithChildren, useState } from 'react';

export default function CompanyLayout({ children }: PropsWithChildren) {
    const [left, toggol] = useState(false)
    return (
        <SidebarProvider dir={'rtl'}>
            <CompanySidebar side={'right'} dir={'rtl'} />
            <SidebarInset className={'flex h-full flex-col'}>
                <header className="border flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12">
                    <div className="flex items-center gap-2 px-4">
                        <SidebarTrigger className="-ml-1" />
                        <Separator
                            orientation="vertical"
                            className="mr-2 h-4"
                        />
                        <Breadcrumb>
                            <BreadcrumbList>
                                <BreadcrumbItem className="hidden md:block">
                                    {/*<Button onClick={caller}>call</Button>*/}
                                    <BreadcrumbLink href="#">
                                        Home
                                    </BreadcrumbLink>
                                </BreadcrumbItem>
                                <BreadcrumbSeparator className="hidden md:block">
                                    <ChevronLeft />
                                </BreadcrumbSeparator>
                                <BreadcrumbItem>
                                    <BreadcrumbPage>Tasks</BreadcrumbPage>
                                </BreadcrumbItem>
                            </BreadcrumbList>
                        </Breadcrumb>
                    </div>
                    <div
                        onClick={() => toggol((v) => !v)}
                        className="ms-auto hover:cursor-pointer p-2">
                        <PanelLeft size={15} />
                    </div>
                </header>
                <div className="flex justify-center p-[2px]">
                    <ScrollArea className="h-[calc(100vh-4rem-12px)] w-[calc(100vw-33rem-2px)] max-w-[calc(100vw-2px)] flex-1 rounded-md border">
                        {children}
                        <ScrollBar orientation="horizontal" />
                        <ScrollBar orientation="vertical" />
                    </ScrollArea>
                    {left && (

                        <div
                            // style={{ display: left ? 'block' : 'none' }}
                            className='w-[16rem] px-1' dir='rtl'>
                            <ScrollArea dir='rtl' className='rounded-md border h-[calc(100vh-4rem-12px)]'>

                                <div className="">dsa</div>
                            </ScrollArea>
                        </div>
                    )}
                </div>
            </SidebarInset>
        </SidebarProvider>
    );
}
