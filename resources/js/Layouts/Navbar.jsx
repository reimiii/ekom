import { Link, usePage } from '@inertiajs/inertia-react';
import { Container } from '@/Components/Container';
import ApplicationLogo from '@/Components/ApplicationLogo';
import NavLink from '@/Components/NavLink';
import DropdownMenu from '@/Components/DropdownMenu';

export const Navbar = () => {
    const {auth} = usePage().props;
    return (
        <>
            <nav className="bg-white border-b py-2">
                <Container>
                    <div className="flex items-center justify-between">
                        <ApplicationLogo/>
                        <div className="flex items-center gap-x-6">
                            <NavLink href={`/`}>Home</NavLink>
                            <NavLink href={route('dashboard')}>Dashboard</NavLink>
                            {auth.user ?
                                <>
                                    <DropdownMenu label={auth.user.name}>
                                        <DropdownMenu.Link href={route('profile.edit')}>Profile</DropdownMenu.Link>
                                        <DropdownMenu.Link href={route('logout')} method={`post`}>Log Out</DropdownMenu.Link>
                                    </DropdownMenu>
                                </> :
                                <>
                                    <NavLink href={route('login')}>Login</NavLink>
                                    <NavLink href={route('register')}>Register</NavLink>
                                </>
                            }
                        </div>
                    </div>
                </Container>
            </nav>
        </>
    )
}