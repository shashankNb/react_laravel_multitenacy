import { configureStore, getDefaultMiddleware } from '@reduxjs/toolkit'
import React from 'react'
import ReactDOM from 'react-dom/client'
import { Provider } from 'react-redux'
import { HashRouter } from 'react-router-dom'
import App from './App/App'
import { rootReducers } from './App/app-store/app.reducer'
import './App/interceptors/request.interceptor'
import { thunk } from 'redux-thunk'
import {ConfigProvider} from "antd";
import './styles.scss'

const root = ReactDOM.createRoot(document.getElementById('root') as HTMLElement);

export const store = configureStore({
    reducer: rootReducers,
    middleware: (getDefaultMiddleware) => getDefaultMiddleware().concat(thunk),
    devTools: process.env.NODE_ENV !== 'production',
});


root.render(
    <React.StrictMode>
        <Provider store={store}>
            <ConfigProvider theme={{ token: {
                    colorPrimary: '#337ab7',
                    colorSuccess: '#5cb85c',
                    colorWarning: '#f0ad4e',
                    colorInfo: '#5bc0de',
                    colorError: '#d9534f',
                    fontFamily: "'Nunito Sans', sans-serif" } }}>
                <HashRouter>
                    <App />
                </HashRouter>
            </ConfigProvider>
        </Provider>
    </React.StrictMode>
)
