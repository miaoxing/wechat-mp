import {Table, TableProvider, useTable} from '@mxjs/a-table';
import {Page} from '@mxjs/a-page';
import {SearchForm, SearchItem} from '@mxjs/a-form';
import DateRangePicker from '@mxjs/a-date-range-picker';
import {Avatar} from '@miaoxing/admin';

const Index = () => {
  const [table] = useTable();

  return (
    <Page>
      <TableProvider>
        <SearchForm>
          <SearchItem label="昵称" name={['search', 'nickName:ct']}/>

          <SearchItem label="首次访问时间" name="_createdAt">
            <DateRangePicker names={[['search', 'createdAt:ge'], ['search', 'createdAt:le']]}/>
          </SearchItem>

          <SearchItem label="最后授权时间" name="_updatedInfoAt">
            <DateRangePicker names={[['search', 'updatedInfoAt:ge'], ['search', 'updatedInfoAt:le']]}/>
          </SearchItem>
        </SearchForm>

        <Table
          tableApi={table}
          columns={[
            {
              title: '头像',
              width: 80,
              dataIndex: 'avatarUrl',
              render: (avatarUrl) =>  <Avatar user={{avatar: avatarUrl}} shape="square" size={48}/>,
            },
            {
              title: '昵称',
              dataIndex: 'nickName',
            },
            {
              title: '首次访问时间',
              dataIndex: 'createdAt',
              width: 200,
            },
            {
              title: '最后授权时间',
              dataIndex: 'updatedInfoAt',
              width: 200,
            },
          ]}
        />
      </TableProvider>
    </Page>
  );
};

export default Index;
