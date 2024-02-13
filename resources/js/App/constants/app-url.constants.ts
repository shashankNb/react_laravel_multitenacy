import { environment } from '../../environments/environment'

export const AppUrl = {
    LOGIN: environment.apiBasePath + '/login',
    SIGN_UP: environment.apiBasePath + '/register',
    AUTHENTICATE: environment.apiBasePath + '/authenticate',
    COUNTRIES: environment.apiBasePath + '/countries',
}
