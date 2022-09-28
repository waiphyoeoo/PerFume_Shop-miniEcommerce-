import React from "react";
import {HashRouter, Route,Routes} from 'react-router-dom';
import Home from "./pages/Home";
import About from "./pages/About";
import Cart from "./pages/Cart";

const Mainroute = ()=> {
    return(
        <HashRouter>
       <Routes>
        <Route path="/" exact element={<Home/>}/>
        <Route path="/about" element={<About/>}/>
        <Route path="/cart" element={<Cart/>}/>
       </Routes>
       </HashRouter>
    )
}
export default Mainroute;