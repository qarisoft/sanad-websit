// import { AppSidebar } from "@/components/company/app-sidebar";
import CompanySidebar from "@/components/company/company-side-bar";
import { SidebarInset, SidebarProvider } from "@/components/ui/sidebar";
import { PropsWithChildren } from "react";

export default function CompanyLayout({ children }: PropsWithChildren) {
    return (
        <SidebarProvider dir={'rtl'}>
            <CompanySidebar side={'right'} dir={'rtl'} />
            <SidebarInset>
                {children}
            </SidebarInset>
        </SidebarProvider>
    );
}
