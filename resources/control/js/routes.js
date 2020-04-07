import { routes as mainRoutes } from './pages/main/routes.js'
import { routes as sitesRoutes } from './pages/sites/routes.js'
import { routes as actionsRoutes } from './pages/actions/routes.js'
import { routes as helpRoutes } from './pages/help/routes.js'
import { routes as exportRoutes } from './pages/export/routes.js'
import { routes as importRoutes } from './pages/import/routes.js'
import { routes as settingsRoutes } from './pages/settings/routes.js'
import { routes as usersRoutes } from './pages/users/routes.js'

export default [
    ...mainRoutes,
    ...sitesRoutes,
    ...actionsRoutes,
    ...helpRoutes,
    ...exportRoutes,
    ...importRoutes,
    ...settingsRoutes,
    ...usersRoutes,
]
