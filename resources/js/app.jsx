import './bootstrap';
import { createInertiaApp } from '@inertiajs/inertia-react';
import React from 'react';
import { createRoot } from 'react-dom';

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props}) {
        const root = createRoot(el)
        root.render(<App {...props}/>)
    }
})