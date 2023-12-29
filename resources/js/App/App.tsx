import { EntityState } from "@reduxjs/toolkit";
import { FC, Fragment, useEffect, useState } from 'react';
import { connect, useDispatch } from 'react-redux';
import { store } from "../index";
import './App.scss';
import { AppState } from './app-store/app.reducer';
import { getState } from "./app-store/app.util";
import { AppStateKeys } from "./app.constants";
import ContentHeader from "./components/Layout/ContentHeader";
import Footer from "./components/Layout/Footer";
import Header from './components/Layout/Header';
import Sidebar from './components/Layout/Sidebar';
import Loading from "./components/Loading/Loading";
import { ComponentStatus } from "./components/Status/store/status.reducer";


const App: FC<{}> = (props, context) => {

    const dispatch = useDispatch();
    const [collapsed, setCollapsed] = useState(false);

    const checkUserPreferences = () => {
        const appSubscriber = store.subscribe(() => {
            const status = getState<EntityState<ComponentStatus>>(store.getState(), AppStateKeys.STATUS).entities;
            console.log(status);
        })
    }
    const initApp = () => {

    }
    useEffect(() => {
        initApp();
    }, []);

    return (
        <Fragment>
            <Fragment>
                <nav className="main-header navbar navbar-expand navbar-white navbar-light">
                    <Header></Header>
                </nav>
                <aside className="main-sidebar sidebar-dark-primary elevation-4">
                    <Sidebar></Sidebar>
                </aside>

                <div className="content-wrapper">
                    <ContentHeader></ContentHeader>
                    <div className="content">
                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-lg-6">
                                    <div className="card">
                                        <div className="card-body">
                                            <h5 className="card-title">Card title</h5>

                                            <p className="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the card's
                                                content.
                                            </p>

                                            <a href="#" className="card-link">Card link</a>
                                            <a href="#" className="card-link">Another link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer className="main-footer">
                    <Footer></Footer>
                </footer>
            </Fragment>
            <Loading></Loading>
        </Fragment>

    )
}

const mapStateToProps = (store: AppState) => ({ store });
export default connect(mapStateToProps)(App);
