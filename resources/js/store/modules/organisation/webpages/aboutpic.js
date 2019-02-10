
//permission

const state = {
    aboutpic:[],
    aboutpics:[],
  },
  getters = {
    AboutPic(state){
      return state.aboutpic;
    },
    AboutPics(state){
      return state.aboutpics;
    }
  }
const actions = {
    aboutpic(context){
        axios.get('/aboutpic/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('aboutpic', response.data.aboutpic); //based on authethicated id
        })
    },
    aboutpics(context){
        axios.get('/aboutpics/get')
        .then((response)=>{
        //   console.log(response.data.aboutpics);
          context.commit('aboutpics', response.data.aboutpics);
        })
    }
  }
const mutations = {
    aboutpic(state, data){
      return state.aboutpic = data;
    },
    aboutpics(state, data){
      return state.aboutpics = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
