import './App.css';
import Button from './components/Button/Button';
import Container from './components/Container/Container';

const App = () => {
  return (
    <>
      <Container title="Sekcijos pavadinimas">
        <Button 
          classes="secondary" 
          text="Antras mygtukas" 
          superMygtukas={true}
        />
        <Button 
          classes="success" 
          text="Trečias mygtukas" 
        />
        <Button 
            classes="danger" 
            text="Ketvirtas mygtukas" 
          />
        <Button 
          classes="light" 
          text="Septintas mygtukas" 
        />
        <Button 
          classes="warning" 
          text="Penktas mygtukas"
        />
        <Button 
          classes="info" 
          text="Šeštas mygtukas" 
        />
        <Button 
          classes="dark" 
          text="Aštuntas mygtukas" 
        />
        <Button 
          classes="primary" 
          text="Pirmas mygtukas" 
          style={{
            fontSize: '2rem'
          }}
        />
      </Container>
    </>
  );
}

export default App;
