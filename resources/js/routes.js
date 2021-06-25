import Peoples from './components/people/PeoplesComponent';
import ShowPeople from './components/people/ShowPeopleComponent';
import PlanetsComponent from "./components/planets/PlanetsComponent";
import ShowPlanetComponent from "./components/planets/ShowPlanetComponent";
import VehiclesComponent from "./components/vehicles/VehiclesComponent";
import ShowVehicleComponent from "./components/vehicles/ShowVehicleComponent";
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
    {
        path: "/planets",
        name: "planets", //a bug here with name conflict on route
        component: PlanetsComponent
    },
    {
        path: "/planets/:url",
        name: "showPlanet",
        component: ShowPlanetComponent
    },
    {
        path: "/vehicles",
        name: "vehicles", //a bug here with name conflict on route
        component: VehiclesComponent
    },
    {
        path: "/vehicles/:url",
        name: "showVehicle",
        component: ShowVehicleComponent
    },
];
