import Index from './Index'
import Edit from './Edit'

export const routes = [
    { path: '/sites', name: 'sites', component: Index },
    { path: '/sites/:id', name: 'sites.edit', component: Edit }
]
