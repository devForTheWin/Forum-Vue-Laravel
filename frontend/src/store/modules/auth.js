import axios from 'axios'

const state = {
    categories: [],
    posts: [],
    singlePost: [],
    postTitle: "",
    postContent: "Write your blog title here...",
    category: "",
    token: null,
    user: null,
    userProfile: null,
    profileId: null,
    profileName: null,
    profileSurname: null,
    profileEmail: null

};

//MUTATIONS
const mutations = {

    SET_TOKEN( state, token ) {
        state.token = token
    },

    SET_USER( state, data ) {
        state.user = data
    },

    SET_PROFILE( state, data ) {
        state.profileId = data.id;
        state.profileName = data.name;
        state.profileSurname = data.surname;
        state.profileEmail = data.email;
    },

    UPDATE_USER( state, payload ) {
        state.user = payload
    },

    SET_CATEGORIES( state, data ) {
        state.categories = data
    },

    SET_POSTS( state, data ) {
        state.posts = data
    },

    SET_SINGLE_POST( state, payload ) {
        return state.singlePost = payload
    },

    NEW_POST_CONTENT( state, payload ) {
        state.postContent = payload;
    },

    NEW_POST_TITLE( state, payload ) {
        state.postTitle = payload;
    },

    NEW_POST_VALUE( state, payload ) {
        state.category = payload;
    },

    changeName( state, payload ) {
        state.profileName = payload;
    },
    changeSurname( state, payload ) {
        state.profileSurname = payload;
    },
    changeEmail( state, payload ) {
        state.profileEmail = payload;
    }
};

//ACTIONS
const actions = {

    async login( { dispatch }, credentials ) {
        let response = await axios.post( 'login', credentials );
        return dispatch( 'attempt', response.data.token )
    },

    //check validation token
    async attempt( { commit }, token ) {
        if ( token ) {
            commit( 'SET_TOKEN', token )
        }

        if ( !state.token ) {
            return
        }

        try {
            let response = await axios.get( 'auth/me' )
            commit( 'SET_USER', response.data )
            commit( 'SET_PROFILE', response.data )
        } catch ( e ) {
            //clear expired token
            commit( 'SET_TOKEN', null )
            commit( 'SET_USER', null )
        }
    },

    singOut( { commit } ) {
        return axios.post( 'logout' ).then( () => {
            commit( 'SET_TOKEN', null )
            commit( 'SET_USER', null )
        } )
    },

    async updateUser( { commit, state } ) {
        await axios.post( 'user', {
            name: state.profileName,
            surname: state.profileSurname,
            email: state.profileEmail
        } );
        commit( 'UPDATE_USER' )
    },

    async allCategory( { commit } ) {
        let { data } = await axios.get( 'categories' );
        commit( 'SET_CATEGORIES', data );
    },

    async posts( { commit }, slug ) {
        if ( !slug ) return;
        try {
            const { data } = await axios.get( `categories/${slug}` );
            commit( 'SET_POSTS', data );
        } catch ( err ) {
            console.log( err )
        }
    },

    async addNewPost( { commit, state } ) {
        console.log( state )

        await axios.post( 'new-post', {
            user_id: state.profileId,
            title: state.postTitle,
            post_text: state.postContent,
            category_id: state.category,
            is_published: 1
        } );
    },

    async singlePost( { commit }, id ) {
        if ( !id ) return;
        try {
            const { data } = await axios.get( `posts/${id}` );
            commit( 'SET_SINGLE_POST', data );
        } catch ( err ) {
            console.log( err )
        }
    }
};

//GETTERS
const getters = {
    authenticated( state ) {
        return state.token && state.user
    },

    user( state ) {
        return state.user
    },

    categories( state ) {
        return state.categories
    },

    posts( state ) {
        return state.posts
    },

    singlePost( state ) {
        return state.singlePost
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}