import { useState } from 'react';
import Button from './components/Button/Button';
import './App.css';

const App = () => {
  const [first, setFirst] = useState('');
  const [second, setSecond] = useState('');
  const [action, setAction] = useState();
  const [result, setResult] = useState();

  const handleDigits = (e) => {
    if (!action) {     
        if(first === '0')
          return;

        setFirst(value => value + e.target.textContent);
    } else {
        if(second === '0' || typeof result !== 'undefined')
          return;

        setSecond(value => value + e.target.textContent);
    }
  }

  const handleAction = (e) => {
    if(first !== '' && typeof result === 'undefined') 
      setAction(e.target.textContent)
  }

  const handleResult = (e) => {
    if(first === '' || second === '')
      return;

    const actions = {
      '+': (a, b) => a + b,
      '-': (a, b) => a - b,
      '*': (a, b) => a * b,
      '/': (a, b) => a / b
    }
    
    setResult(actions[action](+first, +second));
  }

  const handleClear = (e) => {
    setFirst('');
    setSecond('');
    setAction();
    setResult();
  }

  const Buttons = () => {
    const result = [];

    for(let i = 9; i >= 0; i--) {
      result[result.length] = <Button key={i} click={handleDigits} content={i} />
    }

    return result;
  }

  return (
    <div className="calculator">
      <div className="results">
        {first} <br />
        {action} <br />
        {second} <br />
        {result}
      </div>
      <div className="digits">
        <Buttons />
      </div>
      <div className="actions mt-2">
        <Button 
          style="warning" 
          content="+" 
          click={handleAction} 
        />
        <Button 
          style="warning" 
          content="-" 
          click={handleAction} 
        />
        <Button 
          style="warning" 
          content="*" 
          click={handleAction} 
        />
        <Button 
          style="warning" 
          content="/" 
          click={handleAction} 
        />
        <Button 
          style="primary" 
          content="=" 
          click={handleResult} 
        />
        <Button 
          style="danger" 
          content="C" 
          click={handleClear} 
        />
      </div>
    </div>
  );
}

export default App;
