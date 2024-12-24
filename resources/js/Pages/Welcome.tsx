// import { AppSidebar } from '@/components/company/app-sidebar';
// import { CarouselPlugin } from '@/components/cards';
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { Card, CardContent } from '@/components/ui/card';
import {
    Carousel,
    CarouselContent,
    CarouselItem,
} from '@/components/ui/carousel';
import { Separator } from '@/components/ui/separator';
import {
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from '@/components/ui/sidebar';
import CompanyLayout from '@/Layouts/company-layout';

const Welcome = () => {
    return (
        <>
            <div className="flex flex-1 flex-col gap-4 p-4 pt-0">
                <div className="grid auto-rows-auto gap-4 md:grid-cols-4">
                    <div className="aspect-video rounded-xl bg-muted/50"></div>
                    <div className="aspect-video rounded-xl bg-muted/50"></div>
                    <div className="aspect-video rounded-xl bg-muted/50"></div>
                    <div className="aspect-video rounded-xl bg-muted/50"></div>
                </div>

                <div className="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min"></div>
            </div>
        </>
    );
};

// import React from "react";

function CarouselSpacing() {
    return (
        <Carousel className="w-full px-2">
            <CarouselContent className="-ml-1">
                {Array.from({ length: 5 }).map((_, index) => (
                    <CarouselItem
                        key={index}
                        className="pl-1 md:basis-1/2 lg:basis-1/3 xl:basis-1/5"
                    >
                        <div className="p-1">
                            <Card>
                                <CardContent className="flex h-40 items-center justify-center p-6">
                                    <span className="text-2xl font-semibold">
                                        {index + 1}
                                    </span>
                                </CardContent>
                            </Card>
                        </div>
                    </CarouselItem>
                ))}
            </CarouselContent>
            {/*<CarouselPrevious />*/}
            {/*<CarouselNext />*/}
        </Carousel>
    );
}

const PageBody = () => {
    return (
        <main>
            <header className="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12">
                <div className="flex items-center gap-2 px-4">
                    <SidebarTrigger className="-ml-1" />
                    <Separator orientation="vertical" className="mr-2 h-4" />
                    <Breadcrumb>
                        <BreadcrumbList>
                            <BreadcrumbItem className="hidden md:block">
                                <BreadcrumbLink href="#">
                                    Building Your Application
                                </BreadcrumbLink>
                            </BreadcrumbItem>
                            <BreadcrumbSeparator className="hidden md:block" />
                            <BreadcrumbItem>
                                <BreadcrumbPage>Data Fetching</BreadcrumbPage>
                            </BreadcrumbItem>
                        </BreadcrumbList>
                    </Breadcrumb>
                </div>
            </header>

            <CarouselSpacing />
        </main>
    );
};

// export default Welcome;
export default function Page() {
    return (
        <CompanyLayout>
            <PageBody />

        </CompanyLayout>
    );
}
