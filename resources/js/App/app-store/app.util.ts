import * as _ from 'lodash';
import {AppState, createAppReducer} from "./app.reducer";

export const identityReducerFactory = <T>(initialState: T) => {
    return createAppReducer<T>(initialState).reducer;
}

export function pluckState<T>(state: AppState, stateKeys: string[]): T {
    return stateKeys && stateKeys.length > 0
        ? _.get(state, stateKeys.join('.'))
        : state;
}

export function getState<T>(state: AppState, stateKeys: string[]): T {
    return pluckState(state, stateKeys);
}

export const cloneState = (state: AppState, selectorState: any, stateKeys: string[]): any => {
    const newState = { ...state };
    let currentStateRef: any = newState;

    for (const key of stateKeys.slice(0, -1)) {
        currentStateRef[key] = { ...currentStateRef[key] };
        currentStateRef = currentStateRef[key];
    }

    currentStateRef[stateKeys[stateKeys.length - 1]] = selectorState;

    return newState;
}

export const cloneAndRemoveState = (state: any, stateKeys: string[]): any => {
    let nodeState: any = {...state};
    for (let i = 0; i < stateKeys.length - 1; i++) {
        nodeState[stateKeys[i]] = {...nodeState[stateKeys[i]]};
        nodeState = nodeState[stateKeys[i]];
    }
    delete nodeState[stateKeys[stateKeys.length - 1]];
    return nodeState;
}
