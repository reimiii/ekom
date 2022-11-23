import { Link, usePage } from '@inertiajs/inertia-react';
import { Container } from '@/Components/Container';
import ApplicationLogo from '@/Components/ApplicationLogo';
import NavLink from '@/Components/NavLink';
import DropdownMenu from '@/Components/DropdownMenu';

export const Navbar = () => {
    const {auth, categories_global, charts_global_count} = usePage().props;
    return (
        <>
            <nav className="bg-white border-b py-2">
                <Container>
                    <div className="flex items-center justify-between">
                        <ApplicationLogo/>
                        <div className="flex items-center gap-x-6">
                            <NavLink href={`/`}>Home</NavLink>
                            <NavLink href={route('products.index')}>Product</NavLink>
                            <DropdownMenu label={`Categories`}>
                                {categories_global.map(category => (
                                    <DropdownMenu.Link key={category.slug} href={`/products?category=${category.slug}`}>
                                        {category.name}
                                    </DropdownMenu.Link>
                                ))}
                            </DropdownMenu>
                            {auth.user ?
                                <>
                                    <DropdownMenu label={auth.user.name}>
                                        <DropdownMenu.Link href={route('profile.edit')}>Profile</DropdownMenu.Link>
                                        <DropdownMenu.Link href={route('dashboard')}>Dashboard</DropdownMenu.Link>
                                        <DropdownMenu.Link href={route('logout')} method={`post`}>
                                            Log out
                                        </DropdownMenu.Link>
                                    </DropdownMenu>
                                    <NavLink className={`flex items-center`} href={`chart`}>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             strokeWidth={1.5} stroke="currentColor" className="inline w-5 h-5">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                  d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                        </svg>
                                        {charts_global_count > 0 && (<span
                                            className={`text-xs text-white bg-red-500 rounded-full px-1`}>{charts_global_count}</span>)}
                                    </NavLink>
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