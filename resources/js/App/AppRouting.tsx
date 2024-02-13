import Login from "./components/Auth/Login/Login";
import Register from "./components/Auth/Register/Register";
import React, {FC} from "react";
import {Navigate, Route, Routes, redirect} from "react-router-dom";
import Home from "./screens/Home/Home";
import PageNotFound from "./404";

export interface AppRoutingProps {
    isAuthenticated: boolean;
}

const routes = [
    {
        path: '/auth/login',
        name: 'Login',
        component: Login,
        isAuthenticatedRoute: false
    },
    {
        path: '/auth/signup',
        name: 'Sign Up',
        component: Register,
        isAuthenticatedRoute: false
    },
    {
        path: '/home',
        name: 'Home',
        component: Home,
        isAuthenticatedRoute: true
    }
];


const AppRouting: FC<AppRoutingProps> = ({isAuthenticated}) => {

    return (
        <Routes>
            {
                routes.filter(i => i.isAuthenticatedRoute).map((route, key) =>
                    (
                        <Route
                            key={key}
                            path={route.path}
                            element={isAuthenticated ? <route.component /> : <Navigate to={'/auth/login'} />}
                        />
                    ))
            }
            {
                routes.filter(i => !i.isAuthenticatedRoute).map((route, key) =>
                    (
                        <Route
                            key={key}
                            path={route.path}
                            element={!isAuthenticated ? <route.component /> : <Navigate to={'/home'} />}
                        />
                    ))
            }
            <Route path="*" element={<PageNotFound />} />
        </Routes>
    )
}

export default AppRouting;
