import Peoples from './components/people/PeoplesComponent'
import ShowPeople from './components/people/ShowPeopleComponent'
export const routes = [
    {
        path: "/peoples",
        name: "peoples",
        component: Peoples
    },
    {
        path: "/peoples/:url",
        name: "showPeople",
        component: ShowPeople
    },
];
