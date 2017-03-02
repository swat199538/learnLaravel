import requests
from bs4 import BeautifulSoup

auto_session = requests.session()

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) '
                         'Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.991'}

url = 'https://www.zhihu.com/#signin'

try:
    # 获取知乎的隐藏域模拟登陆
    r = auto_session.get(url=url, headers=headers)
    print(r.request.headers)

    r.raise_for_status()

    r.encoding = r.apparent_encoding

    s = BeautifulSoup(r.text, 'html.parser')

    values = s.select_one('form')

    xsrf = ''

    for x in values.find_all('input', attrs={'name': '_xsrf'}):
        xsrf = x

    soup2 = BeautifulSoup(str(xsrf), 'html.parser')

    # 获取到知乎隐藏域
    xsrf = soup2.contents[0]['value']

    # 构造登陆请求
    login_info = {
        '_xsrf': '3fddc6cb9dc00127de8db33003a76e4f',
        'password': 'qq19810810',
        'email': 'wangliang199538@live.com'
    }

    logined = auto_session.post(url='https://www.zhihu.com/login/email', headers=headers, data=login_info)

    if logined.status_code is 200:
        logined = auto_session.get(url='https://www.zhihu.com', headers=headers)

        logined.encoding =logined.apparent_encoding

        print(logined.text)
    else:
        print('登陆失败')

except:
    print('出错了')
