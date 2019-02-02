// import Axios from "axios";

// // import Vue from 'vue'
// // import Vuex from 'vuex'
// // Vue.use(Vuex)
// //pemission module
//     const permModule = {
//       state:{
//         permissions:[],
//       },
//       getters:{
//         Permissions(state){
//           return state.permissions
//         }
//       },
//       actions:{
//         permissions(context){//permission.index route laravel
//           axios.get('/permission-list')
//           .then((response)=>{
//             console.log(response.data.permissions)
//             context.commit('permissions', response.data.permissions)
//           })
//         }
//       },
//       mutations:{
//         permissions(state, data){
//           return state.permissions = data
//         }
//       }
//     }
// //roles module    
//     const roleModule = {
//       state:{
//         roles:[],
//       },
//       getters:{
//         Roles(state){
//           return state.roles
//         }
//       },
//       actions:{
//         roles(context){//permission.index route laravel
//           axios.get('/role-list')
//           .then((response)=>{
//             console.log(response.data.roles)
//             context.commit('roles', response.data.roles)
//           })
//         }
//       },
//       mutations:{
//         roles(state, data){
//           return state.roles = data
//         }
//       }
//     } 


    // import Vue from 'vue';
    // import Vuex from 'vuex';// import Axios from "axios";
    
    // import permission from './modules/permission';
    // import role from './modules/role';
    // import user from './modules/user';
    // // Vue.use(Vuex)
    
    
    
    // export default ({
    //       modules: {
    //         permission:
    //               role:
    //               user:
    //       }
    //     })
    
        // store.state.permission // -> `permModule`'s state
        // store.state.role // -> `roleModule`'s state
    
    
    
        // import Vue from 'vue'
        // import Vuex from 'vuex'
        import permission from './modules/permission'
        import role from './modules/role'
        import user from './modules/user'
        
        // Vue.use(Vuex)
        
        // const debug = process.env.NODE_ENV !== 'production'
        
        export default {
          modules: {
            user,
            permission,
            role,
          },
          // strict: debug,
          // plugins: debug ? [createLogger()] : []
        }

