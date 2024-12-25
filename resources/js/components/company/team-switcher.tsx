import * as React from "react"
import { ChevronsUpDown, Plus } from "lucide-react"

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuShortcut,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import {
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    useSidebar,
} from "@/components/ui/sidebar"
import { AppLogoSVG } from "../ui/icons"

export function TeamSwitcher({
    teams,
}: {
    teams: {
        name: string
        logo: React.ElementType
        plan: string
    }[]
}) {
    const { isMobile } = useSidebar()
    const [activeTeam, setActiveTeam] = React.useState(teams[0])

    return (
        <SidebarMenu>
            <SidebarMenuItem>
                <DropdownMenu>
                    <DropdownMenuTrigger asChild >
                        <SidebarMenuButton
                            size="lg"
                            className="data-[state=open]:bg-sidebar-accen data-[state=open]:text-sidebar-accent-foreground"
                        >
                            <div className="flex aspect-square size-10 items-center justify-center rounded-lg  bg-white p-1  shadow-sm drop-shadow-sm text-sidebar-primary-foreground">
                                {/* <activeTeam.logo className="size-4" /> */}
                                <AppLogoSVG />
                            </div>
                            <div className="grid flex-1 text-start text-sm leading-tight">
                                <span className="truncate font-semibold">
                                    {'سند'}
                                </span>
                                <span className="truncate text-xs">{activeTeam.plan}</span>
                            </div>
                            {/* <ChevronsUpDown className="ms-auto" /> */}
                        </SidebarMenuButton>
                    </DropdownMenuTrigger>

                </DropdownMenu>
            </SidebarMenuItem>
        </SidebarMenu>
    )
}



type Team = {
    name: string
    logo: React.ElementType
    plan: string
}
const Teams = ({
    teams,
    isMobile,
    setActiveTeam
}: {
    isMobile: boolean
    setActiveTeam: (t: Team) => void
    teams: Team[]
}) => {
    return (
        <DropdownMenuContent
            className="w-[--radix-dropdown-menu-trigger-width] min-w-56 rounded-lg"
            align="start"
            side={isMobile ? "bottom" : "right"}
            sideOffset={4}
        >
            <DropdownMenuLabel className="text-xs text-muted-foreground">
                Teams
            </DropdownMenuLabel>
            {teams.map((team, index) => (
                <DropdownMenuItem
                    key={team.name}
                    onClick={() => setActiveTeam(team)}
                    className="gap-2 p-2"
                >
                    <div className="flex size-6 items-center justify-center rounded-sm border">
                        <team.logo className="size-4 shrink-0" />
                    </div>
                    {team.name}
                    <DropdownMenuShortcut>⌘{index + 1}</DropdownMenuShortcut>
                </DropdownMenuItem>
            ))}
            <DropdownMenuSeparator />
            <DropdownMenuItem className="gap-2 p-2">
                <div className="flex size-6 items-center justify-center rounded-md border bg-background">
                    <Plus className="size-4" />
                </div>
                <div className="font-medium text-muted-foreground">Add team</div>
            </DropdownMenuItem>
        </DropdownMenuContent>
    )
}
