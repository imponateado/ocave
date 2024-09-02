# Documentação da API

**Endpoint**: `baseurl/filterSalesReport.php`

**Método**: `GET`

**Descrição**:  
Obtém e retorna dados filtrados de vendas e rotas no formato JSON.

## Parâmetros de Consulta

- `startDate` (opcional): Data de início para filtragem. Formato: `YYYY-MM-DD`
- `endDate` (opcional): Data de término para filtragem. Formato: `YYYY-MM-DD`
- `vendedor` (opcional): Filtra pelo nome do vendedor.
- `rota` (opcional): Filtra pelo ID da rota.

## Exemplo de Requisição

```javascript
fetch('/path/to/script.php?startDate=2024-01-01&endDate=2024-12-31&vendedor=JohnDoe&rota=1')
  .then(response => response.json())
  .then(data => {
    console.log(data); // Use esses dados para atualizar a UI
  });