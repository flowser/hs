
//bureauadmin module

const state = {
    bureauadmins:[],
    bureauadmin:[],
  };
const getters = {
    Bureauadmins(state){
      return state.bureauadmins;
    },
    Bureauadmin(state){
      return state.bureauadmin;
    }
  };
const actions = {
    bureauadmins(context){//permission.index route laravel
      axios.get('/bureauadmin/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('bureauadmins', response.data.bureauadmins);
      });
    },
    BureauAdminById(context, payload){
        axios.get('/bureauadmin/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('bureauadmin', response.data.bureauadmin);
              });
  }
}
const mutations = {
    bureauadmins(state, data){
      return state.bureauadmins = data;
    },
    bureauadmin(state, data){
      return state.bureauadmin = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};




