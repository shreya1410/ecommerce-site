import HomeComponent from "./components/HomeComponent";
import ExampleComponent from "./components/ExampleComponent";
import CategoryComponent from "./components/CategoryComponent";
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
    }
];

export default route;
