import HomeComponent from "./components/HomeComponent";
import SliderHomeComponent from "./components/SliderHomeComponent";
import CategoryComponent from "./components/CategoryComponent";
import SubCategoryComponent from "./components/SubCategoryComponent";
import PagesComponent from "./components/PagesComponent";
import ContactUsComponent from "./components/ContactUsComponent";
import ProductsComponent from "./components/ProductsComponent";
import ProductDetail from "./components/ProductDetail";


const route =[
    {
        path :'/Home',
        component :HomeComponent
    },
    {
      path : '/sliderhome',
      component: SliderHomeComponent
    },

    {
        path :'/category',
        component: CategoryComponent
    },
    {
        path :'/subcategory/:id',
        component: SubCategoryComponent
    },
    {
        path:'/products/:id',
        component: ProductsComponent
    },
    {
        path: '/pages',
        component: PagesComponent
    },
    {
        path: '/contactus',
        component: ContactUsComponent
    },
    {
        path :'/productdetail/:slug',
        component: ProductDetail
    }
];

export default route;
