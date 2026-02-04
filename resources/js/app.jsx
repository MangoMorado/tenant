import React from 'react';
import { createRoot } from 'react-dom/client';

function App() {
    return (
        <div style={{ padding: 40 }}>
            <h1>Laravel + React funcionando 🚀</h1>
        </div>
    );
}

const root = createRoot(document.getElementById('app'));
root.render(<App />);
