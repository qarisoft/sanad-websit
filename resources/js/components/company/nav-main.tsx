'use client';

import { ChevronLeft, type LucideIcon } from 'lucide-react';

import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
    useSidebar,
} from '@/components/ui/sidebar';

export function NavMain({
    items,
}: {
    items: {
        title: string;
        url: string;
        icon?: LucideIcon;
        isActive?: boolean;
        items?: {
            title: string;
            url: string;
        }[];
    }[];
}) {
    const { open } = useSidebar();
    return (
        <SidebarGroup>
            <SidebarGroupLabel>Platform</SidebarGroupLabel>
            <SidebarMenu>
                {items.map((item, i) => {
                    const isActive = i === 3;
                    return (
                        <Collapsible
                            key={item.title}
                            asChild
                            defaultOpen={item.isActive}
                            className="group/collapsible"
                        >
                            <SidebarMenuItem>
                                <CollapsibleTrigger asChild>
                                    <SidebarMenuButton
                                        // isActive={isActive}
                                        tooltip={item.title}
                                        size={'lg'}
                                        className={`my ${open ? '' : 'my-2 rounded-xl shadow-md drop-shadow-sm'}`}
                                    >
                                        {item.icon && (
                                            <div
                                                data-active={isActive}
                                                className={`flex aspect-square size-9 items-center justify-center rounded-[15px] bg-white p-1 text-blue-600 shadow-md shadow-gray-300 drop-shadow-sm data-[active=true]:bg-blue-600 data-[active=true]:text-white`}
                                            >
                                                <item.icon
                                                    className={`size-4`}
                                                />
                                            </div>
                                        )}

                                        <span className={'ps-2'}>
                                            {item.title}
                                        </span>
                                        {(item.items?.length ?? 0) > 0 && (

                                            <ChevronLeft className="ms-auto transition-transform duration-200 group-data-[state=open]/collapsible:-rotate-90" />
                                        )}
                                    </SidebarMenuButton>
                                </CollapsibleTrigger>

                                <CollapsibleContent>
                                    <SidebarMenuSub>
                                        {item.items?.map((subItem, i2) => (
                                            <SidebarMenuSubItem
                                                key={subItem.title}
                                            >
                                                <SidebarMenuSubButton
                                                    asChild
                                                    isActive={
                                                        isActive && i2 === 1
                                                    }
                                                >
                                                    <a href={subItem.url}>
                                                        <span>
                                                            {subItem.title}
                                                        </span>
                                                    </a>
                                                </SidebarMenuSubButton>
                                            </SidebarMenuSubItem>
                                        ))}
                                    </SidebarMenuSub>
                                </CollapsibleContent>
                            </SidebarMenuItem>
                        </Collapsible>
                    );
                })}
            </SidebarMenu>
        </SidebarGroup>
    );
}
