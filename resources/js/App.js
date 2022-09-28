import React from 'react';
import Mainroute from './Mainroute';
import {createRoot} from 'react-dom/client';
import { CartContextProvider } from './pages/context/CartContext';

function App() {
  
  return (
    <CartContextProvider>    
      <Mainroute/>
    </CartContextProvider>
  );
}

createRoot(document.querySelector('#root')).render(<App/>);