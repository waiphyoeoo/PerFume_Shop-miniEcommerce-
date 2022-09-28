import axios from 'axios';
import React, { useContext, useEffect, useState } from 'react'
import CartContext from './context/CartContext'
import Master from './layout/Master'
import Spinner from './Component/Loader';

export default function Cart() {
    const cart = useContext(CartContext);
    const [Loader,setLoader] = useState(false);
    const [cartList,setCartList] = useState(cart.cart);
    const header = {
      "Content-Type": "multipart/form-data",
      "Access-Control-Allow-Origin": "*",
      'Content-Type': 'application/json',
      'Access-Control-Allow-Methods': 'GET, PUT, POST, DELETE, OPTIONS'
    }
    //totalAmount
    let totalAmount;
    if (cartList.length > 0) {
      const arr=cartList.map((d)=>{
      	return Number(d.price);
    })
    totalAmount = arr.reduce((num1,num2)=>{
      return(
        num1+=num2
      )
    })
    }else{
      totalAmount=0;
    }
    //addOrder
      const addOrder = () =>{
       setCartList(cartList);
       cartList.map((d)=>{
        let data = {category_id:d.category_id,
          description:d.description,
          name:d.name,
          price: d.price,
          thumbnail:d.thumbnail,totalAmount};
          console.log(data);
          axios.post('http://localhost:8000/api/order',data).then(({data})=>{
            console.log(data);
            setLoader(true);
            if (data.message===true) {
              alert("Order is requested Successfully")
              setLoader(false);
            }
           })
       })
      }
      
 
    
  return (
    <Master>
      {
        Loader ?       <Spinner/>
        :
        <div className="container">
        <div className="row">
            <div className="col-md-12">
                <h4 className='text-center'>Show Cart List</h4>
            </div>
        </div>
        <div className="row">
            <div className="col-md-12">
            <table className="table">
<thead>
<tr>
  <th scope="col">Images</th>
  <th scope="col">Name</th>
  <th scope="col">Price</th>
</tr>
</thead>
<tbody>
{cartList.map((d)=>{
    return(
        <tr key={d.id}>
    <td><img src={`http://localhost:8000/storage/${d.thumbnail}`} alt="images" height="100px" width="100px" className='img-thumbnail'/>
    </td>
    <td>{d.name}</td>
    <td>{d.price}</td>
   </tr>
    )
})}
</tbody>
</table>

            </div>
        </div>
        <div className="row">
            <div className="col-md-12 d-flex bd-highlight mb-3">
                <h3 className='p-2 bd-highlight'>Total Amount</h3>
                <p className='ms-auto p-2 bd-highlight'>{totalAmount}</p>
            </div>
        </div>
        <div className="row">
          <div className="col-md-12 text-center">
                <button className='btn btn-lg btn-danger'
                disabled={cartList.length === 0 ? true : false}
                onClick={()=>addOrder()}
                >Order Now</button>
          </div>
        </div>
    </div>
      }

       
    </Master>
  )
}
