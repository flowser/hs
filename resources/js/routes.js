import AdminHome from './components/admins/AdminHome.vue';
//Permission
import PermissionList from './components/admins/organisation/superadmin/permission/List.vue';
//role
import RoleList from './components/admins/organisation/superadmin/role/List.vue';
//user
import UserList from './components/admins/organisation/superadmin/user/List.vue';
//Organisation settings
import Orgsetting from './components/admins/organisation/Organisation.vue';
// // //course
// // import CourseList  from './components/admin/course/List.vue'
// // import AddCourse  from './components/admin/course/New.vue'
// // import EditCourse  from './components/admin/course/Edit.vue'

// // //FrontEnd Comonent
// // import PublicHome from './components/public/PublicHome.vue'
// // import BlogCourse from './components/public/blog/BlogCourse.vue'
// // import SingleCourse from './components/public/blog/SingleBlog.vue'




export const routes = [
    {
      path: '/home',
      component: AdminHome
    },
    //Permisions
    {
      path: '/permissions',
      component: PermissionList
    },

    //Roles
    {
      path: '/roles',
      component: RoleList
    },

    //Users
    {
      path: '/users',
      component:UserList
    },
    //Organisation Settings
    {
      path: '/settings',
      component:Orgsetting
    },

//   //Course
//     {
//       path: '/course-list',
//       component: CourseList
//     },
//     {
//       path: '/add-course',
//       component: AddCourse
//     },
//     {
//       path:'/edit-course/:courseid',
//       component: EditCourse
    // },


// //Front End
//   {
//     path:'/',
//     component: PublicHome
//   },
//   {
//     path:'/blog',
//     component: BlogCourse
//   },
//   {
//     path:'/blog/:id',
//     component: SingleCourse
//   },
//   {
//     path:'/categories/:id',//be reirected to courese blog via category selection
//     component: BlogCourse
//   },



];


