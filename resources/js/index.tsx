import 'admin-lte/plugins/fontawesome-free/css/all.min.css';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle';
import 'admin-lte/dist/js/adminlte';
import './styles.scss'

import { configureStore, getDefaultMiddleware } from '@reduxjs/toolkit'
import React from 'react'
import ReactDOM from 'react-dom/client'
import { Provider } from 'react-redux'
import { HashRouter } from 'react-router-dom'
import App from './App/App'
import { rootReducers } from './App/app-store/app.reducer'
import './App/interceptors/request.interceptor'
import { thunk } from 'redux-thunk'

const root = ReactDOM.createRoot(document.getElementById('root') as HTMLElement);

export const store = configureStore({
    reducer: rootReducers,
    middleware: (getDefaultMiddleware) => getDefaultMiddleware().concat(thunk),
    devTools: process.env.NODE_ENV !== 'production',
});


root.render(
    <React.StrictMode>
        <Provider store={store}>
                <HashRouter>
                    <App />
                </HashRouter>
        </Provider>
    </React.StrictMode>
)
