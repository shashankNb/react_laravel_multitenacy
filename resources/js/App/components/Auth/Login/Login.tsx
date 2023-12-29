import axios from 'axios'
import { FC, useState } from 'react'
import { useNavigate } from 'react-router-dom'
import { AppUrl } from '../../../constants/app-url.constants'
import { TokenService } from '../token.service'

export interface LoginState {
    showModal: boolean;
    isLoading: boolean;
    error: null;
}

export interface LoginProps {
    name?: string;
}

const Login: FC<LoginProps> = (props, context) => {

    let navigate = useNavigate();

    const [state, setState] = useState<LoginState>({
        error: null,
        isLoading: false,
        showModal: true
    });

    const initialValues = { email: '', password: '', rememberMe: false }

    const submitForm = (e: any) => {
        setState((prevState) => ({ ...prevState, isLoading: false }))
        const { email, password, rememberMe } = e

        axios.post(AppUrl.AUTHENTICATE, e)
            .then(response => handleResponse(response))
            .catch(err => console.log(err))
    }

    const handleResponse = (data: { [p: string]: any }) => {
        TokenService.handleToken(data.token)
        setState(prev => ({ ...prev, isLoading: false }))
        return navigate('/home')
    }

    return (
       <div>Hello</div>
    )
}

export default Login;
