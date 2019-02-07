// import Axios from "axios";
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
    const country = {
      state:{
        countries:[],
      },
      getters:{
        Countries(state){
          return state.countries
        }
      },
      actions:{
        countries(context){//permission.index route laravel
          axios.get('/country/get')
          .then((response)=>{
            console.log(response.data.countries)
            context.commit('countries', response.data.countries)
          })
        }
      },
      mutations:{
        countries(state, data){
          return state.countries = data
        }
      }
    }


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
        import permission from './modules/permission';
        import role from './modules/role';
        import user from './modules/user';
        import countries from './modules/countries';
        import counties from './modules/counties';
        import towns from './modules/towns';
        import organisation from './modules/organisation/organisation';
        import about from './modules/organisation/webpages/about';

        // Vue.use(Vuex)

        // const debug = process.env.NODE_ENV !== 'production'

        export default {
          modules: {
            user,
            permission,
            role,
            countries,
            counties,
            towns,
            organisation,
            about,
          },
          // strict: debug,
          // plugins: debug ? [createLogger()] : []
        };

