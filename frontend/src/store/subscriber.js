import axios from "axios";

const subscriber = ( store ) => {
    store.subscribe( ( mutation ) => {
        switch ( mutation.type ) {
            case 'auth/SET_TOKEN':
                if ( mutation.payload ) {
                    axios.defaults.headers.common[ 'Authorization' ] = `Bearer ${mutation.payload}`
                    localStorage.setItem('token', mutation.payload)
                } else {
                    axios.defaults.headers.common[ 'Authorization' ] = null
                    localStorage.removeItem('token')
                }

                break;
        }
    } )
}

export default subscriber;