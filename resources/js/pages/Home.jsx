import React,{useContext, useEffect,useState} from 'react';
import Master from './layout/Master';
import Axioss from '../config/Axioss';
import Loader from './Component/Loader';
import CartContext from './context/CartContext';
export default function Home() {
  const [loader,setloader]=useState(true);
  const [data,setData] = useState({data:[]});
  const [category,setCategory] = useState([]);
  const [selectedCategory,setselectedCategory] = useState(null);

  //pagniation
  const [currentPage,setcurrentPage] = useState(1);

  //api
  const [api,setApi]  = useState('/product');
  useEffect(()=>{
    Axioss.get(api).then((res)=>{
      setData(res.data.data);
      setloader(false);
    })
    Axioss.get('/category').then((res)=>{
      setloader(false);
      setCategory(res.data.data);
    })
  },[api]);
   
  //selectedCategory
const renderProductbyCategory = (id) =>{
  setselectedCategory(id);
  setcurrentPage(1);
  setApi('/product?category_id=' +id);
}

  //render next
  const renderNext = () => {
    setcurrentPage(currentPage+1);
    let page = currentPage+1;
    if (selectedCategory===null) {
      setApi(`/product?page=${page}`);
    }else{
      setApi(`/product?category_id=${selectedCategory}&page=${page}`);
    }
  }
  //render prev
  const renderPrev = () =>{
    setcurrentPage(currentPage-1);
    let page = currentPage -1;
    if (selectedCategory===null) {
      setApi(`/product?page=${page}`);
    }else{
      setApi(`/product?category_id=${selectedCategory}&page=${page}`);
    }
  }
  //context
  const cart  = useContext(CartContext);
  //addtocart
  const addtocart = (d) =>{
    cart.setCart([...cart.cart,d]);
  }
  return (
    <Master>
    {
      loader ? <Loader/> : <div className="container">
        <div className="row">
              {
                category.map((c)=>{
                  return(
                    <div className="col-md-6">
                    <div className="card p-3">
                  <span className= { selectedCategory===c.id ? "btn btn-dark" : "btn btn-outline-dark"}  
                  key={c.id} onClick = {()=> renderProductbyCategory(c.id)}  >
                    {c.name}</span>
                  </div>
          </div>
                 ) })
              }
           
        </div>
        <div className="row mt-2">
          <div className="col-md-12">
            <button disabled={data.prev_page_url === null ? true : false} className='btn btn-sm btn-primary' 
            onClick={()=>renderPrev()}
            ><span className="fas fa-arrow-left"></span></button>
            <button className='ms-3 btn btn-sm btn-primary' 
            disabled={data.next_page_url===null ? true : false} 
            onClick={()=>renderNext()}
            ><span className=' fas fa-arrow-right'></span></button>
          </div>
        </div>
      <div className="row mt-2">
        {
          data.data.map((d)=>{
          return(
            <div className="col-md-4" key={d.id}>
            <div className="card mt-3">
              <img src={`http://localhost:8000/storage/${d.thumbnail}`} alt="image" width='322px' height={200} className='card-image'/>
              <div className="card-body">
              <h4 className='text-center'>{d.name}</h4>
              <div className="d-flex justify-content-between mt-3">
                <span className='btn btn-sm btn-outline-warning'>{d.price}</span>
                <span className='btn btn-sm btn-danger' onClick={()=>addtocart(d)}>Add to Cart</span>
              </div>
            </div>
            </div>
          </div>
          )
          })
        }
       
      </div>
    </div>
    }
      
    </Master>
  )
}
