import HomeComponent from "./components/HomeComponent";
import ExampleComponent from "./components/ExampleComponent";
import CategoryComponent from "./components/CategoryComponent";
import SubCategoryComponent from "./components/SubCategoryComponent";

const route =[
    {
        path :'/Home',
        component :HomeComponent
    },
    {
        path :'/demo',
        component :ExampleComponent
    },
    {
        path :'/category',
        component: CategoryComponent
    },
    {
        path :'/subcategory/:id',
        component: SubCategoryComponent
    }
];

export default route;
