import React, { useContext } from 'react';
import {Link} from 'react-router-dom';
import CartContext from '../context/CartContext';


export default function Master(props) {
  const cart = useContext(CartContext);

  return (
   <React.Fragment>
   <nav className="navbar navbar-expand-lg navbar-light bg-light">
  <div className="container-fluid">
    <a className="navbar-brand" href="#">
      Perfume Shop
    </a>
    <button
      className="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i className="fas fa-bars" />
    </button>
    <div className="collapse navbar-collapse" id="navbarNav">
      <ul className="navbar-nav">
        <li className="nav-item">
          <Link className="nav-link active" aria-current="page" to="/">
            Home
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/cart">
            Cart <span className='badge badge-danger'>{cart.cart.length}</span>
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/about">
            About
          </Link>
        </li>
        {/* <li className="nav-item">
          <a className="nav-link" href="http://localhost:8000/login" >
            Login
          </a>
        </li> */}
      </ul>
    </div>
  </div>
</nav>

    <div className="container">
        <div className=" p-3 m-3">
            {props.children}
        </div>
    </div>
   </React.Fragment>
    )
}
