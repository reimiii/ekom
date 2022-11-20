import React from 'react';
import App from '@/Layouts/App';
import { Head } from '@inertiajs/inertia-react';
import { Container } from '@/Components/Container';
import ProductItem from '@/Components/ProductItem';
import Header from '@/Components/Header';

export default function Index(props) {
    const {data: products, meta, links} = props.products;
    return (
        <>
            <Head title="Product"/>
            <Header  title={`Product`} description={`Temukan Buku yang sesuai !!`}/>
            <Container>
                {products.length ?
                    <div className={`grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10`}>
                        {products.map(product => (
                            <ProductItem product={product} key={product.id}/>
                        ))}
                    </div>
                    : null}
            </Container>
        </>
    );
}

Index.layout = page => <App children={page}/>