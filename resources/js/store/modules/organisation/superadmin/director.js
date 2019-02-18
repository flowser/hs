
//director module

const state = {
    directors:[],
  };
const getters = {
    Directors(state){
      return state.directors;
    }
  };
const actions = {
    directors(context){//permission.index route laravel
      axios.get('/orgdirector/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('directors', response.data.directors);
      });
    }
  }
const mutations = {
    directors(state, data){
      return state.directors = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};

