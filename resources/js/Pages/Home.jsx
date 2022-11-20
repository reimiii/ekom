import React from 'react';
import App from '@/Layouts/App';
import { Container } from '@/Components/Container';
import { Head } from '@inertiajs/inertia-react';

export default function Home(props) {
    return (
        <>
            <Head title="Home"/>
            <Container>
                Home
            </Container>
        </>
    );
}

Home.layout = page => <App children={page}/>

