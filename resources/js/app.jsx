import './bootstrap'

import { createInertiaApp } from '@inertiajs/react'
import { createRoot } from 'react-dom/client'
import Template from './Template.jsx'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./App/**/*.jsx', { eager: true })
    let page = pages[`./App/${name}.jsx`]
    page.default.layout = page.default.layout || ((page) => <Template children={page}/>)
    return page
  },
  setup({ el, App, props }) {
    createRoot(el).render(<App {...props} />)
  },
  progress: {
    color: '#fff'
  }
})