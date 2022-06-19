import axios from 'axios';

// let lang = localStorage.getItem('lang') ?? 'ar';

export default axios.create({
  baseURL: 'http://localhost:8000/api/v1',
  headers: {
    'Content-Type': 'application/json; charset=UTF-8',
    Authorization: 'Bearer t0fSSpN7jq5d1uopfyOl1JstcK0Q04I0BbWm0wkO',
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN':
      'eyJpdiI6InMyUlA5b0JWN1pCYW8vTXpYSklZYkE9PSIsInZhbHVlIjoiQ0ZDQmVDaXdpNUtPc0pPN2VUSHVYM1JmVTE1T3VSWEJWSXNwMGZ1NmwvSFFrMEVvNG1mMHNGOFpFRWtkc1gyVGlFSTV6RkxzQlhFQkNwdEErUlg1ZWZuRnZLSFc4eGpLcmZvdlJEM2tqZ0V5OUZ5cFl2a1E3dFNVWGtBQUpQVGwiLCJtYWMiOiJkMTFlYjUxNjVjYzYzNWRiZDBjZWIzYjZiMWIwOTJhOTVlMmZhMjliMzRjNjQxZTc3ZjY1YmZiNGYxMjZlNzk2IiwidGFnIjoiIn0',
  },
});
