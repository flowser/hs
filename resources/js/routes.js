import AdminHome from './components/admins/AdminHome.vue'
//Permission
import PermissionList from './components/admins/organisation/superadmin/permission/List.vue'
import AddPermission  from './components/admins/organisation/superadmin/permission/New.vue'
import EditPermission  from './components/admins/organisation/superadmin/permission/Edit.vue'
//role
import RoleList from './components/admins/organisation/superadmin/role/List.vue'
import AddRole  from './components/admins/organisation/superadmin/role/New.vue'
import EditRole  from './components/admins/organisation/superadmin/role/Edit.vue'
//user
import UserList from './components/admins/organisation/superadmin/user/List.vue'
import AddUser  from './components/admins/organisation/superadmin/user/New.vue'
import EditUser  from './components/admins/organisation/superadmin/user/Edit.vue'
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
    { 
      path: '/add-permission', 
      component: AddPermission 
    },
    { 
      path:'/edit-permission/:permissionid',
      component: EditPermission 
    },

    //Roles
    { 
      path: '/roles', 
      component: RoleList 
    },
    { 
      path: '/add-role', 
      component: AddRole 
    },
    { 
      path:'/edit-role/:roleid',
      component: EditRole 
    },

    //Users
    { 
      path: '/users', 
      component:UserList 
    },
    { 
      path: '/add-user', 
      component: AddUser 
    },
    { 
      path:'/edit-user/:userid',
      component: EditUser 
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


