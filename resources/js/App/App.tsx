import {EntityState} from "@reduxjs/toolkit";
import React, {FC, Fragment, useEffect, useState} from 'react';
import {connect, useDispatch} from 'react-redux';
import {store} from "../index";
import './App.scss';
import {AppState} from './app-store/app.reducer';
import {getState} from "./app-store/app.util";
import {AppStateKeys} from "./app.constants";
import {ComponentStatus} from "./components/Status/store/status.reducer";
import {Layout} from 'antd';
import {TokenService} from "./components/Auth/token.service";
import {AppActionFactory, FetchState} from "./app-store/app.action";
import {AppUrl} from "./constants/app-url.constants";
import {RequestMethod} from "./app.model";
import {useLocation, useNavigate} from "react-router-dom";
import AppRouting from "./AppRouting";
import withStyles from "react-jss";

const { Header, Sider, Content, Footer } = Layout;

const styles = {
    layoutHeight: {
        minHeight: '100vh'
    }
}

const App: FC<{}> = (props, context) => {

    const [isAuthenticated, setIsAuthenticated] = useState(false);
    const [isLoading, setIsLoading] = useState(false);

    const dispatch = useDispatch();
    const location = useLocation();
    const navigate = useNavigate();

    const onLoadAuthCheck = () => {
        if (location.pathname !== '/auth/login') {
            const payload: FetchState = {
                method: RequestMethod.POST,
                body: {token: TokenService.getToken()},
                url: AppUrl.AUTHENTICATE,
                onSuccess: (response) => {
                    initializeDefaults()
                },
                onError: () => {
                    TokenService.removeToken();
                    navigate('/auth/login');
                }
            }
            store.dispatch(AppActionFactory.fetchData(payload));
        }
    }

    const initApp = () => {
        onLoadAuthCheck();

    }

    const initializeDefaults = () => {
        fetchPreferences();
        fetchCountries();
        checkAppStatus();
    }

    const fetchPreferences = () => {

    }

    const fetchCountries = () => {
        const payload: FetchState = {
            method: RequestMethod.GET,
            url: AppUrl.COUNTRIES,
            stateKeys: ['countries'],
            statusId: 'COUNTRIES',
            statusStateKeys: AppStateKeys.STATUS,
            onError: () => navigate('/unauthorized')
        }
        store.dispatch(AppActionFactory.fetchData(payload));
    }

    const checkAppStatus = () => {
        const appSubscriber = store.subscribe(() => {
            const status = getState<EntityState<ComponentStatus>>(store.getState(), AppStateKeys.STATUS).entities;
        })
    }

    useEffect(() => {
       initApp();
    }, []);

    useEffect(() => {
        navigate("/auth/login");
        return () => {
            console.log('Clean-up');
        };
    }, [isAuthenticated, !isLoading]); // Specify

    return (
        <Fragment>
            <AppRouting isAuthenticated={isAuthenticated}></AppRouting>
            {/*<Loading></Loading>*/}
        </Fragment>

    )
}

const mapStateToProps = (store: AppState) => ({ store });
export default connect(mapStateToProps)(withStyles(styles)(App));
