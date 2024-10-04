<template>
    <div class="login">
      <h2>Iniciar Sesión</h2>
      <form @submit.prevent="login">
        <div>
          <label for="email">Correo Electrónico:</label>
          <input type="email" v-model="email" required />
        </div>
        <div>
          <label for="password">Contraseña:</label>
          <input type="password" v-model="password" required />
        </div>
        <button type="submit">Iniciar Sesión</button>
      </form>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        password: '',
        errorMessage: ''
      };
    },
    methods: {
  async login() {
    try {
      const response = await axios.post('http://127.0.0.1:8000/api/login', {
        email: this.email,
        password: this.password
      });

      const token = response.data.token;
      localStorage.setItem('token', token); // Almacena el token en el localStorage

      // Redirigir a una página protegida después del inicio de sesión exitoso
      if (this.$router) {
  this.$router.push('/dashboard');
} else {
  console.error('Vue Router no está disponible.');
}

    } catch (error) {
      if (error.response) {
        // El servidor respondió con un código de estado fuera del rango 2xx
        console.error('Error en la respuesta:', error.response.data);
        console.error('Estado del servidor:', error.response.status);
        this.errorMessage = 'Error en la respuesta del servidor: ' + error.response.data.error;
      } else if (error.request) {
        // La solicitud fue hecha pero no se recibió respuesta
        console.error('Error en la solicitud:', error.request);
        this.errorMessage = 'No se recibió respuesta del servidor.';
      } else {
        // Algo sucedió al configurar la solicitud
        console.error('Error al hacer la solicitud:', error.message);
        this.errorMessage = 'Error al intentar iniciar sesión.';
      }
    }
  }
}

    
  };
  </script>
  
  
  <style scoped>
  .login {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .login h2 {
    text-align: center;
  }
  .login div {
    margin-bottom: 15px;
  }
  .login label {
    display: block;
    margin-bottom: 5px;
  }
  .login input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
  }
  .login button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
  }
  .login button:hover {
    background-color: #0056b3;
  }
  .login p {
    color: red;
    text-align: center;
  }
  </style>
  