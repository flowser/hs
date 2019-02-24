
//specificbureauadmin module

const state = {
    specificbureauadmins:[],
    specificbureauadmin:[],
  };
const getters = {
    Specificbureauadmins(state){
      return state.specificbureauadmins;
    },
    Specificbureauadmin(state){
      return state.specificbureauadmin;
    }
  };
const actions = {
    specificbureauadmins(context){//permission.index route laravel
      axios.get('/specificbureauadmin/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('specificbureauadmins', response.data.specificbureauadmins);
      });
    },
    SpecificbureauadminById(context, payload){
        axios.get('/specificbureauadmin/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('specificbureauadmin', response.data.specificbureauadmin);
              });
  }
}
const mutations = {
    specificbureauadmins(state, data){
      return state.specificbureauadmins = data;
    },
    specificbureauadmin(state, data){
      return state.specificbureauadmin = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};






