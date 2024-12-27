import {
    AudioWaveform,
    BookOpen,
    Bot,
    Command,
    Frame,
    GalleryVerticalEnd,
    HomeIcon,
    Map,
    PieChart,
    Settings2,
    SquareTerminal,
} from 'lucide-react';
import * as React from 'react';

import { NavMain } from '@/components/company/nav-main';
import { NavProjects } from '@/components/company/nav-projects';
import { NavUser } from '@/components/company/nav-user';
import { TeamSwitcher } from '@/components/company/team-switcher';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarRail,
} from '@/components/ui/sidebar';
import { Home, SHomeIcon } from '../ui/icons';

// This is sample data.
const data = {
    user: {
        name: 'shadcn',
        email: 'm@example.com',
        avatar: '/favicon-32x32.png',
    },
    teams: [
        {
            name: 'Acme Inc',
            logo: GalleryVerticalEnd,
            plan: 'Enterprise',
        },
        {
            name: 'Acme Corp.',
            logo: AudioWaveform,
            plan: 'Startup',
        },
        {
            name: 'Evil Corp.',
            logo: Command,
            plan: 'Free',
        },
    ],
    navMain: [
        {
            title: 'الرئيسية',
            url: '#',
            icon: SHomeIcon,
            isActive: true,
            items: [
                // {
                //     title: 'History',
                //     url: '#',
                // },
                // {
                //     title: 'Starred',
                //     url: '#',
                // },
                // {
                //     title: 'Settings',
                //     url: '#',
                // },
            ],
        },
        {
            title: 'المعاينات',
            url: '#',
            icon: Bot,
            items: [
                // {
                //     title: 'Genesis',
                //     url: '#',
                // },
                // {
                //     title: 'Explorer',
                //     url: '#',
                // },
                // {
                //     title: 'Quantum',
                //     url: '#',
                // },
            ],
        },
        {
            title: 'المستخدمين',
            url: '#',
            icon: BookOpen,
            items: [
                // {
                //     title: 'Introduction',
                //     url: '#',
                // },
                // {
                //     title: 'Get Started',
                //     url: '#',
                // },
                // {
                //     title: 'Tutorials',
                //     url: '#',
                // },
                // {
                //     title: 'Changelog',
                //     url: '#',
                // },
            ],
        },
        {
            title: 'الأعدادات',
            url: '#',
            icon: Settings2,
            items: [
                {
                    title: 'General',
                    url: '#',
                },
                {
                    title: 'Team',
                    url: '#',
                },
                {
                    title: 'Billing',
                    url: '#',
                },
                {
                    title: 'Limits',
                    url: '#',
                },
            ],
        },
    ],
    projects: [
        {
            name: 'Design Engineering',
            url: '#',
            icon: Frame,
        },
        {
            name: 'Sales & Marketing',
            url: '#',
            icon: PieChart,
        },
        {
            name: 'Travel',
            url: '#',
            icon: Map,
        },
    ],
};

export default function CompanySidebar({
    ...props
}: React.ComponentProps<typeof Sidebar>) {
    return (
        <Sidebar collapsible="icon" {...props}>
            <SidebarHeader>
                <TeamSwitcher teams={data.teams} />
            </SidebarHeader>
            <SidebarContent>
                <NavMain items={data.navMain} />
                <NavProjects projects={data.projects} />
            </SidebarContent>
            <SidebarFooter>
                <NavUser user={data.user} />
            </SidebarFooter>
            <SidebarRail />
        </Sidebar>
    );
}
