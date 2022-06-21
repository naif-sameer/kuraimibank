import axios from 'axios';

// let lang = localStorage.getItem('lang') ?? 'ar';

export default axios.create({
  baseURL: 'http://localhost:8000/api/v1',
  headers: {
    'Content-Type': 'application/json; charset=UTF-8',
    Authorization: 'Bearer LuB8yjJ0DEbxsWIkacZox9h8CgxD11cxV8YmASJM',
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN':
      'eyJpdiI6Ik5PRldaM3g5dldlVjNKbVVUa0d3WkE9PSIsInZhbHVlIjoiL2QzcW5YdEptSCt5aXN6eHp2bmk1VzRkdDB1elg0U1A0MmVaNmlnVTZ1c1A2ZjlzeEM3MXMwVlNZNnNJbTNxZnVqRkQvRWV6dDd6UmlncU5IMVJLajhmOXg2eGFHNkhXRXVGQk1hemoySmxVbEpCTXNUcXY4dWhKTVA5Qk1lMHYiLCJtYWMiOiJkNzM0ZTc3M2QyMjQ1Mjc2NzFjMjVhNThiNjcyMzMzNTIzN2FlMzJjMWM5ZDFiMjQ1ZTAwY2M1ODUxY2M1Y2E0IiwidGFnIjoiIn0',
  },
});
