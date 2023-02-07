import { Route, Routes } from '@solidjs/router';
import type { Component } from 'solid-js';
import Navbar from './components/Navbar';
import Schedule from './views/Schedule';

const App: Component = () => {
  return (
    <>
      <header class="container">
        <Navbar />
      </header>
      <main class="container">
        <Routes>
          <Route path="/:id?" component={Schedule} />
        </Routes>
      </main>
    </>
  );
};

export default App;
